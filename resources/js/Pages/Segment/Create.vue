<template>
  <Master>
    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
      <!--begin::Col-->
      <div class="col-xxl-12 mb-5 mb-xl-12">
        <!--begin::Chart widget 8-->
        <div class="card card-flush h-xl-100">
          <!--begin::Header-->
          <div class="card-header pt-5">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
              <span class="card-label fw-bold text-dark">Segment Logic</span>
            </h3>
            <!--end::Title-->
          </div>
          <!--end::Header-->
          <!--begin::Body-->
          <div class="card-body pt-6">
            <!--begin::Tab content-->
            <!--begin::Repeater-->
            <div>
              <!--begin::Form group-->
              <div class="form-group row mb-5">
                <div class="col-md-2">
                  <FormLabel label="Segment Name" />
                </div>
                <div class="col-md-8">
                  <FormInput
                    @input="updateSegmentName($event)"
                    placeholder="Enter segment name"
                  />
                </div>
              </div>

              <SegmentRule
                :rules="segmentForm.rule"
                @add-and-rule="addAndRule"
                @add-or-rule="addOrRule"
                @remove-or-rule="removeOrRule"
                @column-change="columnChange"
                @condition-change="conditionChange"
                @enter-value="enterValue"
              />

              <div class="form-group row mb-5 mt-12">
                <div class="col-md-2 my-1">
                  <a
                    href="javascript:;"
                    @click="segmentSubmit"
                    class="btn btn-primary me-2"
                  >
                    Save
                  </a>
                  <a href="javascript:;" class="btn btn-light-primary"
                    >Cancel</a
                  >
                </div>
              </div>
              <!--end::Form group-->
            </div>
          </div>
          <!--end::Body-->
        </div>
        <!--end::Chart widget 8-->
      </div>
      <!--end::Col-->
    </div>
    <!--end::Row-->
  </Master>
</template>

<script>
import Master from "@/Layouts/Master.vue";
import FormInput from "@/Components/FormInput.vue";
import FormLabel from "@/Components/FormLabel.vue";
import SegmentRule from "@/Components/SegmentRule.vue";
import axios from "axios";

export default {
  components: {
    Master,
    FormLabel,
    FormInput,
    SegmentRule,
  },

  data() {
    let structure = { column: "created_at", condition: "", value: "" };
    return {
      structure: JSON.parse(JSON.stringify(structure)),
      segmentForm: {
        name: "",
        rule: [[JSON.parse(JSON.stringify(structure))]],
      },
    };
  },

  methods: {
    segmentSubmit() {
      axios
        .post(route("segment.store"), this.segmentForm)
        .then(
          function (response) {
            toastr.success("Segment created successfully!");
            this.resetForm();
          }.bind(this)
        )
        .catch((error) => {
          toastr.error("Something went wrong!");
        });
    },
    resetForm() {
      this.segmentForm.name = "";
      this.segmentForm.rule = [[JSON.parse(JSON.stringify(this.structure))]];
    },
    addAndRule: function () {
      this.segmentForm.rule.push([JSON.parse(JSON.stringify(this.structure))]);
    },
    addOrRule: function (index) {
      this.segmentForm.rule[index].push(
        JSON.parse(JSON.stringify(this.structure))
      );
    },
    removeOrRule(orIndex, andIndex) {
      this.segmentForm.rule[andIndex].splice(orIndex, 1);
      if (this.segmentForm.rule[andIndex].length == 0) {
        this.segmentForm.rule.splice(andIndex, 1);
      }
    },
    updateSegmentName($event) {
      let name = $event.target.value;
      this.segmentForm.name = name;
    },
    columnChange(column_name, orIndex, andIndex) {
      this.segmentForm.rule[andIndex][orIndex].column = column_name;
    },
    conditionChange(condition, orIndex, andIndex) {
      this.segmentForm.rule[andIndex][orIndex].condition = condition;
    },
    enterValue(value, orIndex, andIndex) {
      this.segmentForm.rule[andIndex][orIndex].value = value;
    },
  },
};
</script>