<template>
    <slot></slot>
    <form method="POST" :action="action" :id="id">
        <input type="hidden" name="_method" value="DELETE"/>
        <input type="hidden" name="_token" :value="csrfToken"/>
    </form>
</template>
<style type="text/css" scoped>
    form{
        display:none;
    }
</style>
<script type="text/javascript">

    export default{
        props: ['action','actionElement','csrfToken'],
        computed:{
            id(){
                return `form-delete-action-${this.actionElement}`;
            }
        },
        ready(){
            let actionElement = this.actionElement,
                    formId = this.id;
            $(document).ready(()=>{
                $(`#${actionElement}`).click((event) =>{
                   event.preventDefault();
                   $(`#${formId}`).submit();
                });
            });
        }
    }
</script>
