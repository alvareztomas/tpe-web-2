{include file = 'header.tpl'}

<div class="container px-5 mt-3">
    <h2 class="text-center">Login</h2>
    <form action="verify" method="POST">
        <div class="input-group mb-3">
            <input class="form-control" id="email" type="text" name="email" placeholder="Email" required>
            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
        </div>
        <input class="btn btn-outline-primary form-control" type="submit" value="Login">
    </form>
<div>
{if $error !== ""}
    <p class="alert alert-danger mt-3">{$error}</p>
{/if}

{include file = 'footer.tpl'}