import uComments from './vue.components/userComments.vue'
import planBox from './vue.components/plan.vue'

let data = {
    
}

let comments = new Vue({
    el: "#scraps",
    data:{},
    components:{
        userComment: uComments
    }
})

let planData = {
    plans: [
        {
            id: 1,
            name: "Pessoal",
            val : {
                pre: '129',
                post: '90'  
            },
            benefits: [
                'Beneficio 1',
                'Benefício 2',
                'Benefício 3',
                'Benefício 4'
            ]
        },
        {
            id: 2,
            name: "Escritório**",
            val : {
                pre: '89',
                post: '90'  
            },
            benefits: [
                'Beneficio 1',
                'Benefício 2',
                'Benefício 3',
                'Benefício 4'
            ]
        },
        {
            id: 3,
            name: "Gratis*",
            val : {
                pre: '00',
                post: '00'  
            },
            benefits: [
                'Beneficio 1',
                'Benefício 2',
                'Benefício 3',
                'Benefício 4'
            ]
        }
    ]
}
let plans = new Vue({
    el: '#plans',
    data: planData,
    components:{
        planBox: planBox
    },
})