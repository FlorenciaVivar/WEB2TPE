{include file="header.tpl"}

<div class="container">
    <form class="form-signin" action="validate" method="POST">
        <img class="mb-4" src="https://i.im.ge/2022/10/09/1GUJhX.descarga.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password"  name="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        {if $error}
            <div class="alert alert-danger mt-3">
                {$error}
            </div>
        {/if}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

    </form>
</div>
{include file="footer.tpl"}
