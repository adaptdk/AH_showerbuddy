
# Is this bathroom occupied?

# Arduino
- Detect connection between two cables
- Send HTTP request to server side application
    https://www.arduino.cc/en/Tutorial/HttpClient

# Laravel application
- Validate request, save isOccupied state in the application
- Expose current isOccupied through REST API
- Serve client-side web interface outputting current state
- (Additionally, perhaps introduce WebSockets to broadcast events)
- Save requests in sql or file to create statistics
