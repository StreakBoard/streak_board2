<?php

dd($users);

?>
<table class="table">
    @foreach ($users as $users => $users_list)
        @foreach ($users_list as $user)
        {{ $user->task }}
        @endforeach
    @endforeach
</table>
