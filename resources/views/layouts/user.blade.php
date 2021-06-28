
    <div class="userAcc">
        <div class="container userContainer">
            <div class="row">
                <div class="userMenuContainer col-3 pr-0">
                    @component('components.user.user_page_menu', ['user' => $user])
                    @endcomponent
                </div>
                <div class="userCotentContainer col-9">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
