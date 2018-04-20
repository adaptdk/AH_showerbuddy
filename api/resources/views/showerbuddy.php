<html>
    <body>
        <h1>
            Der er fandme <?php echo \App\OccupiedState::isOccupied() ? 'optaget' : 'ledigt'; ?>!
        </h1>
    </body>
</html>
