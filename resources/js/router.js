import Detail from './components/Detail';
import Home from './components/Home';
import Login from './components/Login';
import Register from './components/Register';
import AdminUser from './components/AdminUser';
import EditUser from './components/EditUser';


export const routes = [

    {
        path:'/detail',
        component:Detail
    },
    {
        path:'/home',
        name:'home',
        component:Home
    },
    {
        path:'/login',
        component:Login
    },
    {
        path:'/register',
        component:Register
    },
    {
        path:'/adminUser',
        name:'adminUser',
        component:AdminUser
    },
    {
        path:'/editUser/:id',
        name:'editUser',
        component:EditUser
    }
]
// const routers = new Router({
//     mode:'history',
//     router:router
// })

