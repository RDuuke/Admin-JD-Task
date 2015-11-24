@if(count($errors) > 0)

            @foreach($errors->all() as $error)
                <div class="chip  red darken-3 col s12 m12 l12 center-align white-text">
                    {!!$error!!}
                    <i class="material-icons">close</i>
                </div>
            @endforeach
@endif