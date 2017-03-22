<template>
    <!-- Dropdown Structure -->
    <ul :id="o.id" class="dropdown-content" v-for="o in menusDropdown">
        <li v-for="item in o.items">
            <a :href="{name: item.routeName}">{{ item.name }}</a>
        </li>
    </ul>
    <ul id="dropdown-logout" class="dropdown-content">
        <li>
            <a :href="{'auth.logout'}">Sair</a>
        </li>
    </ul>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="javascript:void(0);" class="brand-logo left">Code Financeiro</a>
                    <a href="javascript:void(0);" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <!-- Dropdown Trigger -->
                        <li v-for="o in menus" >
                            <a v-if="o.dropdownId" class="dropdown-button" href="javascript:void(0);" :data-activates="o.dropdownId">{{ o.name }}<i class="material-icons right">arrow_drop_down</i></a>
                            <a v-else :href="{name: o.url}">{{ o.name }} **{{ o.url }}</a>
                        </li>
                        <li>
                            <a class="dropdown-button" href="javascript:void(0);" data-activates="dropdown-logout">{{ name }}<i class="material-icons right">arrow_drop_down</i></a>
                        </li>
                    </ul>
                </div>
                <ul id="nav-mobile" class="side-nav">
                    <li v-for="o in menus">
                        <a :href="{o.url}">{{ o.name }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script type="text/javascript">
    import Auth from '../services/auth';
    export default{
        data(){
            return {
                menus: [
                    { name: 'Conta Bancaria', routeName: 'bank-account.list' },
                    //{name: 'Contas a Pagar', dropdownId: 'teste'},
                    //{name: 'Contas a Receber', routeName: 'auth.login'},
                ],
                menusDropdown: [
                    /*{
                        id: 'teste',
                        items: [
                            {name: 'Listar Contas', routeName: 'auth.login'},
                            {name: 'Criar Contas', routeName: 'auth.login'}
                        ]
                    }*/
                ],
                user: Auth.user
            }
        },
        computed:{
            name(){
                return this.user.data ? this.user.data.name : ''
            }
        },
        ready(){
            $('.button-collpse').sideNav();
            $('.dropdown-button').dropdown();
        }
    }
</script>
