<?php
@session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: swags"); // Redirecting To Home Page
}
?>