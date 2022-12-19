<template>
  <div
    class="row mb-12"
    v-for="(or_rules, andIndex) in andRules"
    :key="andIndex"
  >
    <SegmentOrRule
      v-for="(orRule, orIndex) in or_rules"
      :key="orIndex"
      :or-rule="orRule"
      :and-index="andIndex"
      :or-index="orIndex"
      @remove-or-rule="removeOrRule"
      @column-change="columnChange"
      @condition-change="conditionChange"
      @enter-value="enterValue"
    />

    <div class="col-md-2 my-1">
      <button
        class="btn btn-light-primary"
        type="button"
        @click="$emit('addOrRule', andIndex)"
      >
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
    andRules: Object,
  },
  data() {
    return {
      or_rules: 0,
      demo: [15, 58, 8],
    };
  },

  components: {
    FormInput,
    FormLabel,
    SegmentOrRule,
  },

  methods: {
    removeOrRule(orIndex, andIndex) {
      this.$emit("removeOrRule", orIndex, andIndex);
    },
    columnChange(column_name, orIndex, andIndex) {
      this.$emit("columnChange", column_name, orIndex, andIndex);
    },
    conditionChange(condition, orIndex, andIndex) {
      this.$emit("conditionChange", condition, orIndex, andIndex);
    },
    enterValue(value, orIndex, andIndex) {
      this.$emit("enterValue", value, orIndex, andIndex);
    },
  },
};
</script>
  