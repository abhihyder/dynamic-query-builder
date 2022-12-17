<template>
  <div class="form-group row mb-5">
    <div class="col-md-2">
      <FormLabel label="Segment Logic" />
    </div>
    <div class="col-md-8">
      <SegmentAndRule :deletable="false" />
      <SegmentAndRule v-for="and_rule in and_rules" :key="and_rule" />
    </div>
  </div>

  <div class="form-group row mb-5 mt-12">
    <div class="col-md-2 my-1"></div>
    <div class="col-md-2 my-1">
      <a href="javascript:;" @click="addAndRule" class="btn btn-light-primary">
        <i class="la la-plus"></i>AND
      </a>
    </div>
  </div>
</template>

<script>
import FormInput from "./FormInput.vue";
import FormLabel from "./FormLabel.vue";
import SegmentAndRule from "./SegmentAndRule.vue";

export default {
  data() {
    return {
      and_rules: 0,
    };
  },

  components: {
    FormInput,
    FormLabel,
    SegmentAndRule,
  },

  methods: {
    addAndRule: function () {
      this.and_rules += 1;
    },
  },
};
</script>
