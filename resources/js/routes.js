import Index from './components/admin/Index';
import CreateUser from './components/admin/CreateUser';
import EditUser from './components/admin/EditUser';
import SportsList from './components/admin/sports/Index';
import TeamList from './components/admin/teams/Index';
import MemberList from './components/admin/members/Index';
import TeamCreate from './components/admin/teams/CreateTeam';
import EditTeam from './components/admin/teams/EditTeam';
import CreateMember from './components/admin/members/CreateMember';
import EditMember from './components/admin/members/EditMember';

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
    {
        path: '/sports',
        name: 'SportsList',
        component: SportsList
    },
    {
        path: '/sports/team_list/:id',
        name: 'TeamList',
        component: TeamList
    },
    {
        path: '/sports/team/members/:id',
        name: 'MemberList',
        component: MemberList
    },
    {
        path: '/sports/team/create/:id',
        name: 'TeamCreate',
        component: TeamCreate
    },
    {
        path: '/sports/team/edit/:id',
        name: 'EditTeam',
        component: EditTeam
    },
    {
        path: '/sports/team/add/member/:id',
        name: 'MemberAdd',
        component: CreateMember
    },
    {
        path: '/sports/team/edit/member/:id',
        name: 'EditMember',
        component: EditMember
    },
];
