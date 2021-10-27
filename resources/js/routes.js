import Index from './components/admin/Index';
import CreateUser from './components/admin/CreateUser';
import EditUser from './components/admin/EditUser';
export const routes = [
    {
        path: '/admin',
        name: 'Index',
        component: Index
    },
    {
        path: '/admin/createuser',
        name: 'CreateUser',
        component: CreateUser
    },
    {
        path: '/admin/edit/:id',
        name: 'EditUser',
        component: EditUser
    },
];