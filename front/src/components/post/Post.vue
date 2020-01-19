<template>
  <div id="deposit">
    <section class="deposit-header">
      <h2>Déposer votre offre d'emploi</h2>
    </section>
    <section class="form-content">
      <form @submit="submitForm($event)" method="post">
        <div class="description-content">
          <h2>L'offre</h2>
          <div class="input-block">
            <form-input v-model="job.title"/>
          </div>
          <div class="multi-select-input">
            <type @input-add="getTags" :multiple="true" :tags="[{code: 1, name: 'php'}, {code: 2, name: 'node'}]"/>
          </div>
          <button type="submit">Valider</button>
        </div>
      </form>
    </section>
  </div>
</template>

<script>
import Input from "../form/Input";
import Type from "../back/Type";

export default {
  components: {
    'form-input': Input,
    'type': Type,
  },
  data() {
    return {
      job: {
        title: '',
        tags: [],
        description: '',
        additionalDescription: '',
        localisation: '',
        startDate: '',
        company: {
          name: '',
          description: '',
          email: ''
        },
        jobLink: '',
        teleworking: ''
      }
    }
  },
  methods: {
    submitForm: function (e) {
      e.preventDefault();
      console.log(JSON.stringify(this.job));
    },

    getTags: function (tags) {
      this.job.tags = tags
    }
  }
}
</script>

<style scoped>

#deposit {
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  align-items: center;
}

.deposit-header {
  display: flex;
  align-items: center;
}

.form-content {
  width: 90%;
}

.multi-select-input, .editor-block, .pretty-box {
  margin-top: 20px;
}

.input-block {
  min-height: 40px;
  display: block;
  border-radius: 5px;
  border: 1px solid #e8e8e8;
  background: #fff;
  font-size: 14px;
  margin-top: 20px;
  padding: 0 10px;
}

.input-block input {
  border: none;
  padding: 10px 0;
  width: 100%;
  font-size: 17px;
}

input:required, input:focus, input:valid {
  box-shadow: none;
}

input:focus,
select:focus,
textarea:focus,
button:focus {
  outline: none;
}

.description-content {
  padding-top: 50px;
}

.description-content h2 {
  position: relative;
  padding-left: 25%;
  font-size: 25px;
}

.description-content h2::before {
  content: " ";
  width: 20%;
  height: 5px;
  background-color: #428bca;
  position: absolute;
  left: 0;
  top: 13px;
}

.multiselect__tag, .multiselect__option--highlight {
  background: #428bca;
}

.multiselect__tag-icon:focus,
.multiselect__tag-icon:hover {
  background: #428bca;
}

.multiselect__option--selected.multiselect__option--highlight {
  background: red;
}

.inline-input {
  display: flex;
  flex-direction: row;
  justify-content: space-between;

}

.inline-input .box {
  width: 49%;
}

.inline-input .multi-select-input {
  width: 25%;
}

.inline-input > .box-link {
  width: 70%;
}

.row-checkbox {
  display: flex;
  flex-direction: column;
  padding-top: 20px;
}

.row-checkbox .pretty {
  margin-top: 20px;
}

.tips-description {
  font-weight: 100;
  font-size: 18px;
  margin-bottom: 10px;
}

button[type="submit"] {
  border: none;
  border-radius: 5px;
  color: #fff !important;
  font-size: 16px;
  outline: none;
  padding: 12px 20px;
  background: #428bca;
  text-decoration: none !important;
  display: inline-block;
  margin: 20px 0;
  width: 200px;
  text-transform: uppercase;
  font-weight: bold;
  cursor: pointer;
}
</style>
