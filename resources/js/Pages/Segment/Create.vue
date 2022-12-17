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
                    name="segment_name"
                    placeholder="Enter segment name"
                  />
                </div>
              </div>

              <SegmentRule />

            
              <div class="form-group row mb-5 mt-12">
                <div class="col-md-2 my-1">
                  <a href="javascript:;" class="btn btn-primary me-2"> Save </a>
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

<script setup>
import Master from "@/Layouts/Master.vue";
import FormInput from "@/Components/FormInput.vue";
import FormLabel from "@/Components/FormLabel.vue";
import SegmentRule from "@/Components/SegmentRule.vue";
</script>