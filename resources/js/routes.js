export default [
    { path: '/home', component: require('./components/Home.vue').default },
    { path: '/candidates', component: require('./components/Candidates.vue').default },
    { path: '/positions', component: require('./components/Positions.vue').default },
    { path: '/results', component: require('./components/Results.vue').default },
    { path: '/schools', component: require('./components/Schools.vue').default },
    { path: '*', component: require('./components/NotFound.vue').default }
];
