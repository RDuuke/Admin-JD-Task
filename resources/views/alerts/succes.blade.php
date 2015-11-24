@if(Session::has('message'))
        <div class="chip  green white-font col s12 m12 l12 center-align">
            {{Session::get('message')}}
            <i class="material-icons">close</i>
        </div>
@endif