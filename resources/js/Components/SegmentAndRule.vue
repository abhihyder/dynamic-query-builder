<template>
  <div class="row mb-12">
    <SegmentOrRule :deletable="deletable" />
    <SegmentOrRule
      v-for="or_rule in or_rules"
      :key="or_rule"
      :deletable="true"
    />
    <div class="col-md-2 my-1">
      <button class="btn btn-light-primary" type="button" @click="addOrRule">
        <i class="la la-plus"></i>OR
      </button>
    </div>
  </div>
</template>
  
<script>
import FormInput from "./FormInput.vue";
import FormLabel from "./FormLabel.vue";
import SegmentOrRule from "./SegmentOrRule.vue";

export default {
  props: {
    deletable: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      or_rules: 0,
    };
  },

  components: {
    FormInput,
    FormLabel,
    SegmentOrRule,
  },
  methods: {
    addOrRule: function () {
      this.or_rules += 1;
    },
  },
};
</script>
  