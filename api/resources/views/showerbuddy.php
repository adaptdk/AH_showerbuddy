<html>

<body style="display:flex;justify-content: center;align-items: center;background-color:<?php echo \App\OccupiedState::isOccupied() ? 'red' : 'green' ?>">
<style>
  body {font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";}
</style>
<script>
    setTimeout(() => {
        location.reload();
    }, 1000);
</script>
    <h1 style="font-weight:normal;text-align:center; color:white;font-size:120px">
    Så der fandeme <b><?php echo \App\OccupiedState::isOccupied() ? 'Optaget' : 'Ledigt' ?></b>
