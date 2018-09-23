/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// $(document).ready(function () {
//     var copy = $(".new-question").clone();
//
//     $('.add-question').click(function () {
//         $(".question-body").slideUp('slow').slideDown('slow').html(copy);
//     });
//     $('.save-question').click(function (event) {
//         event.preventDefault();
//         $('.final-result').html('در حال ذخیره سازی...');
//         var questionContent = $('#question_content').val();
//         var option1 = $('#option-1').val();
//         var option2 = $('#option-2').val();
//         var option3 = $('#option-3').val();
//         var option4 = $('#option-4').val();
//         var radio_selected = $('input[type=radio]:checked').val();
//         var quiz_id = $('.quiz_title').data('id');
//         var url = $('.quiz_title').data('action');
//
//         axios.post(url, {
//             question_content: questionContent,
//             option_1: option1,
//             option_2: option2,
//             option_3: option3,
//             option_4: option4,
//             radioSelected: radio_selected,
//             quizId : quiz_id
//
//         })
//             .then(function (response) {
//                 // handle success
//                 $('.final-result').html('سوال با موفقیت ذخیره شد');
//                 $('.add-question').prop('disabled', false);
//             })
//             .catch(function (error) {
//                 // handle error
//                 console.log(error);
//             })
//     });
// });

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
