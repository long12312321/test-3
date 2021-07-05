import Detail from './components/Detail';
import Home from './components/Home';
import Login from './components/Login';
import Register from './components/Register';
import AdminUser from './components/AdminUser';
import EditUser from './components/EditUser';
import AdminPost from './components/AdminPost';
import EditPost from './components/EditPost';
import EditComment from './components/EditComment';
import AdminComment from './components/AdminComment';


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
    },
    {
        path:'/editPost/:id',
        name:'editPost',
        component:EditPost
    }, 
    {
        path:'/adminPost',
        name:'adminPost',
        component:AdminPost
    },
    {
        path:'/adminComment',
        name:'adminComment',
        component:AdminComment
    },
    {
        path:'/editComment/:id',
        name:'editComment',
        component:EditComment
    },
]
// const routers = new Router({
//     mode:'history',
//     router:router
// })

