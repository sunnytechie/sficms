
		<template>
  <div class="main">
    <!-- Page Header -->
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col-md-12">
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
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Basic Form</h5>
          </div>
          <div class="card-body">
            <form action="#">
              <ckeditor> </ckeditor>
              <div class="text-left mt-3">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </form>
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
                <a class="nav-link " href="#solid-tab1" data-toggle="tab" :v-model="jovial"
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
                        <a href="javascript:void(0)" class="chat-compose">
                          <i class="material-icons">control_point</i>
                        </a>
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
                          />
                        </div>
                      </form>
                      <div class="chat-users-list" v-for="(result, index) in results" :key="index">
                        <div class="chat-scroll">
                          <a href="javascript:void(0);" class="media mt-0">
                            <div class="media-img-wrap">
                              <div class="avatar avatar-away">
                                <img
                                  src="https://images.pexels.com/photos/5119214/pexels-photo-5119214.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                  alt="User Image"
                                  class="avatar-img rounded-circle"
                                />
                              </div>
                            </div>
                            <div class="media-body">
                              <div>
                                <div class="user-name" @click="selectResult(result)">
                                  {{result}}
                                </div>
                                <div class="user-last-chat">
                                  Mrs Chizoba Ihewugo
                                </div>
                              </div>
                              <div>
                                <div class="last-chat-time block">Nigeria, Lagos Area 1, Deborah chapter</div>
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
      selectedTitle: "",
      results: [],
      menus: [
        {
          name: "countries",
        },
        {
          name: "Area",
        },
        {
          name: "Chapters",
        },
        {
          name: "Contacts",
        },
      ],
      items: {
        countries: ["Nigeria", "South Africa", "Canada"],
        Area: ["Oba"],
        Chapters: ["area one", "area two"],
        Contacts: ["chidideveloer@gmail.com", "sunnyaforka@gmail.com", "jovialcoreblog@gmail.com", "ogami@gmail.com"],
      },
    };
  },

  methods: {
    selectedMenu(item) {
      this.results = [];
      if (this.results.length == 0) {
        this.selectedTitle = item;
        // this.menus.find((finder) => finder.name == item);
        this.results = this.items[item];
      }
    },
    selectResult(item) {
      this.results = [];
      if (this.results.length == 0) {
        this.selectedTitle = item;
        //api will give me a list of contacts related to nigerian state
        axios
        .get('/locations/'+item)
        .then(response => {
            this.results = response.data;
        })
        .catch(error => {
            console.log(error)
        })
      }
    },
    mounted() {
      console.log(this.coutries);
      this.coutries.forEach(function (item) {
        this.areas.push({ country: item, states: this.states[0][item] });
      }, this);
    },
  },
};
</script>

        <style>
</style>
