	<template>
  <div class="main">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="d-flex align-items-center">
            <h5 class="page-title">Dashboard</h5>
            <ul class="breadcrumb ml-2">
              <li class="breadcrumb-item">
                <a href="index.html"><i class="fas fa-home"></i></a>
              </li>
              <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Vertical Form</li>
            </ul>
          </div>
      </div>
      		<div class="col flex-grow-1 alert alert-success alert-dismissible fade show" role="alert" v-show="notifMsg">
										<strong>Success!</strong> Your <a href="#" class="alert-link">message</a> has been sent successfully.
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
        </div>

    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header clearfix ">
              <div class="float-left" >
                <h5 class="card-title text-left" ref="status"> Send Mail</h5>
              </div>
            <div class="float-right" >
                <a href="" class="btn bg-primary-light"><b> Schedule Email </b></a>
            </div>
          </div>
          <div class="card-body">
              	<div class="form-group row">

								<div class="col mx-auto">
										<input type="text" class="form-control" placeholder="Entire title here..."  v-model="title" required>
								</div>
						</div>

              <ckeditor v-model="msg" > </ckeditor>
              <div class="text-left mt-3">
                <button type="submit" class="btn btn-primary"  href="javascript:void(0);" @click=" sendMail">Send</button>
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card bg-white">
          <div class="card-header">
            <h5 class="card-title">Select-contact Settings</h5>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-solid" >
              <li class="nav-item" v-for="(menu, index) in menus" :key="index" @click="selectedMenu(menu.name)">
                <a class="nav-link " href="#solid-tab1" data-toggle="tab"
                  >{{ menu.name}}</a
                >
              </li>
            </ul>
            <div class="tab-content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="chat-window">
                    <div class="chat-cont-left">
                      <div class="chat-header">
                        <span ref="selectedTitle">Selected Contacts</span>
                        <label v-show="showCheckBox">
                          Check all  <input  type="checkbox" name="check" @click="checkAll" v-model="allCheckedVal">
                        </label>
                      </div>
                      <form class="chat-search">
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <i class="fas fa-search"></i>
                          </div>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Search"
                            v-model="searchInput"
                          />
                        </div>
                      </form>
                      <div class="chat-users-list" v-for="(result, index) in output" :key="index">
                            <div class="form-check " v-show="showCheckBox" >
                                <input type="checkbox" class="form-check-input mt-4" v-bind:value="result.email" @click="mailSelect" v-model="sendToDb" >
                            </div>
                        <div class="chat-scroll">
                          <a href="javascript:void(0);" class="media mt-0">
                            <div class="media-img-wrap ml-2 mt-2" >

                                <span class="dot" style="color:white"> {{ result.name.match(/(\b\S)?/g).join("").match(/(^\S|\S$)?/g).join("").toUpperCase() }} </span>


                            </div>
                            <div class="media-body" >
                              <div class="">
                                <div class="user-name" @click="selectResult(result.name, selectedTitle)">
                                  {{result.name}}
                                </div>
                                <div class="user-last-chat">
                                  {{result.email}}
                                </div>
                              </div>
                              <div>
                                <!-- <div class="last-chat-time block">Nigeria, Lagos Area 1, Deborah chapter</div> -->
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="tab-pane show active" id="solid-tab1">
                List of COUNTRIES sfi belongs to
              </div>
              <div class="tab-pane" id="solid-tab2">
                List of STATES sfi belongs to
              </div>
              <div class="tab-pane" id="solid-tab3">
                List of AREAS sfi belongs to
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CKEditor from "ckeditor4-vue";
Vue.use(CKEditor);
export default {
  data() {
    return {
      title: "",
      msg: "",
      notifMsg: null,
      selectedTitle: "",
      allCheckedVal: false,
      sendToDb: [],
      results: [],
      showCheckBox: false,
      searchInput: "",
      menus: [
        {
          name: "Country",
        },
        {
          name: "State",
        },
        {
          name: "Area",
        },
        {
          name: "Chapter",
        },
        {
          name: "Category",
        },
        {
          name: "Contact",
        },
      ],
      items: {
        Country: [],
        Area: [],
        State: [],
        Chapter: [],
        Category: [],
        Contact: [],
      },
    };
  },
  methods: {
    mailSelect() {
      this.allCheckedVal = false;
    },
    //retrieve all contacts from database
    getAllContact() {
      this.results = [];
      this.showCheckBox = true;
      if (this.results.length == 0) {
        axios
          .get("/api/contacts/")
          .then((response) => {
            this.results = response.data;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    //toggle menus -country, states, etc
    selectedMenu(item) {
      this.results = [];
      //toggle the checkbox to true or false when you click on the menu items
      if (item == "Contact") {
        this.getAllContact();
      } else {
        this.showCheckBox = false;
      }
      if (this.results.length == 0) {
        //confirm that there are no values in the result array
        this.selectedTitle = item;
        this.results = this.items[item];
      }
    },
    selectResult(item, tableName) {
      this.results = [];
      if (this.results.length == 0) {
        axios
          .get("/api/details/" + item + "/" + tableName)
          .then((response) => {
            this.results = response.data;
            this.showCheckBox = true;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
    checkAll() {
      this.sendToDb = [];
      if (!this.allCheckedVal) {
        for (let i = 0; i < this.results.data.length; i++) {
          this.sendToDb.push(this.results.data[i].email.toString()); //I am using the dot.name from the api to add a truthy or falsy value to the checboxes upon click so it checks if it is true or unchecks the box when it is false
        }
      }
    },
    sendMail() {
      if (this.sendToDb.length == 0 && this.msg == "") return;
      this.$refs.status.innerHTML = "Sending...";
      axios
        .post("/api/send-mail", {
          title: this.title,
          message: this.msg,
          email: this.sendToDb,
        })
        .then((response) => {
          this.notifMsg = "Mail was successfully sent !!!"; //
          this.$refs.status.innerHTML = "Send Mail";
          this.title = ""; //clean the title field
          this.msg = ""; //clean the message body fields
          this.allCheckedVal = false;
          this.sendToDb = [];
        })
        .catch((error) => {
          this.notifMsg = error.success;
        });
    },
  },
  /*
Also note that you write your code  from top to bottom  i.e starting from what the ui does first...what does the user do first when he/she comes to your app...thats what you code first!!!
 two key important variable here (data & computed property)here is
  ****this.results ^data property
        and
****output ^output computed Porperty
*/
  computed: {
    output() {
      //the is used for what its seen in the template directive for listing all the result...so it will search for the data and all that
      //forget...virtually anything is possible in tech...i am awesome!!!
      //All I can say here is woooow....in tech don't lookdown on yourself...almost anything is possible and never underestimate your own approach...yours could be the ideal best practice meeen....how did I got this mini app architecture..I am writing this thing down ...yoo
      if (this.results.data) {
        //check if the result data property that has all our first entry data (aafter manipulation form api call/db) has some value
        let searchTerm = new RegExp(this.searchInput, "i"); //regex here to make sure that mismatched capitalization doesn’t matter, as users will typically not capitalize as they type.
        return this.results.data.filter((contact) =>
          contact.name.match(searchTerm)
        );
      }
    },
    initials() {
      for (let i = 0; i < this.output.length; i++) {
        return (this.output[i].initials = this.output[i].name
          .split(" ")
          .map((name) => name[0])
          .join(""));
      }
    },
  },
  mounted() {
    axios
      .all([
        axios.get("/api/countries"),
        axios.get("/api/states"),
        axios.get("/api/areas"),
        axios.get("/api/chapters"),
        axios.get("/api/categories"),
        axios.get("/api/contacts"),
      ])
      .then(
        axios.spread(
          (
            countryResponse,
            stateResponse,
            areaResponse,
            chapterResponse,
            categoryResponse,
            allContactResponse
          ) => {
            this.items.Country = countryResponse.data;

            //   this.results.push(this.items.countries.data);
            this.items.State = stateResponse.data;
            this.items.Area = areaResponse.data;
            this.items.Chapter = chapterResponse.data;
            this.items.Contact = allContactResponse.data;
            this.items.Category = categoryResponse.data;
          }
        )
      )
      .catch((error) => console.log(error));
  },
};
</script>

  <style>
.dot {
  height: 25px;
  width: 25px;
  display: table-cell;
  text-align: center;
  vertical-align: middle;
  border-radius: 50%;
  background-color: #7469ee;
  font-size: 10px;
}
</style>
