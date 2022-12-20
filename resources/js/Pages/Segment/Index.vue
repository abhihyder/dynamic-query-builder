<template>
  <Master>
    <div id="kt_app_content" class="app-content flex-column-fluid">
      <!--begin::Content container-->
      <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Card-->
        <div class="card">
          <!--begin::Card body-->
          <div class="card-body py-4">
            <!--begin::Table-->
            <div
              id="kt_table_users_wrapper"
              class="dataTables_wrapper dt-bootstrap4 no-footer"
            >
              <div class="table-responsive">
                <table
                  class="
                    table
                    align-middle
                    table-row-dashed
                    fs-6
                    gy-5
                    dataTable
                    no-footer
                  "
                  id="kt_table_users"
                >
                  <!--begin::Table head-->
                  <thead>
                    <!--begin::Table row-->
                    <tr
                      class="
                        text-start text-muted
                        fw-bold
                        fs-7
                        text-uppercase
                        gs-0
                      "
                    >
                      <th class="min-w-40px sorting">SL</th>
                      <th class="min-w-125px sorting">Name</th>
                      <th class="min-w-125px sorting text-center">
                        No. Of RUle
                      </th>
                      <th class="min-w-125px sorting text-center">
                        Subscriber
                      </th>
                    </tr>
                    <!--end::Table row-->
                  </thead>
                  <!--end::Table head-->
                  <!--begin::Table body-->
                  <tbody class="text-gray-600 fw-semibold">
                    <tr v-for="(rule, index) in rules" :key="index">
                      <td>{{ index + 1 }}</td>
                      <td>{{ rule.name }}</td>
                      <td class="text-center">{{ rule.no_of_rule }}</td>
                      <td class="text-center">
                        <span v-if="rule.no_of_subscriber !== false">
                          {{ rule.no_of_subscriber }}</span
                        >
                        <button
                          v-else
                          @click="getSubscriberCount(rule.id, index)"
                          class="btn btn-primary btn-sm"
                        >
                          <i class="fa fa-eye fs-md"></i> Show
                        </button>
                      </td>
                    </tr>
                  </tbody>
                  <!--end::Table body-->
                </table>
              </div>
            </div>
            <!--end::Table-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Card-->
      </div>
      <!--end::Content container-->
    </div>
  </Master>
</template>


<script>
import Master from "@/Layouts/Master.vue";
import moment from "moment";
import axios from "axios";

export default {
  data() {
    return {
      rules: [],
    };
  },
  components: {
    Master,
  },
  created() {
    this.getRules();
  },

  methods: {
    getRules() {
      axios
        .post(route("segment.get-segment"))
        .then((response) => {
          this.updateRuleData(response.data.data);
        })
        .catch((error) => {
          toastr.error("Something went wrong!");
        });
    },

    getSubscriberCount(segment_id, index) {
      axios
        .post(route("segment.segment-wise-subscriber"), { segment_id })
        .then((response) => {
          this.rules[index].no_of_subscriber = response.data.data.total_record;
        })
        .catch((error) => {
          toastr.error("Something went wrong!");
        });
    },

    updateRuleData(data) {
      data.map((item) => {
        item.no_of_rule = 0;
        item.no_of_subscriber = false;
        let rule = JSON.parse(item.rule);
        item.rule = rule;
        rule.map((andRule) => {
          andRule.map(() => {
            item.no_of_rule++;
          });
        });
        this.rules.push(item);
      });
    },
  },
};
</script>