<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 10:22 AM
 */

function LoginForm()
{
    ?>
    <label for="username">Username: </label>
    <input type="text" name="username" /><br/>
    <label for="password">Password: </label>
    <input type="password" name="password" /><br/>
    <input type="submit" value="Login" />
    <?php
}