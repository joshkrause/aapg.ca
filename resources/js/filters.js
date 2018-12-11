import Vue from 'vue';
import moment from 'moment';

Vue.filter('dateFromNow', function(date) {
    return moment(date).fromNow();
});
Vue.filter('boolYN', function(bool) {
    if(bool)
    {
        return "Yes";
    }
    else
    {
        return "No";
    }
})
Vue.filter('dateClean', function(date) {
    if(date)
    {
        return moment(date).format("dddd, MMMM Do YYYY, h:mm:ss a");
    }
    else
    {
        return '';
    }
});