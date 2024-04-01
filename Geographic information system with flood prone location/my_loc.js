document.addEventListener("DOMContentLoaded", function () {
  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    showError({ message: "Geolocation is not supported by your browser." });
  }
});

function showPosition(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  // Display the location on the HTML page
  const locationElement = document.getElementById("location");
  locationElement.innerHTML = `Your current position is:<br>Latitude: ${latitude}<br>Longitude: ${longitude}`;

  // You can now use the latitude and longitude with the Big Data API to retrieve additional information if needed.
}

function showError(error) {
  const locationElement = document.getElementById("location");

  switch (error.code) {
    case error.PERMISSION_DENIED:
      locationElement.innerHTML = "User denied the request for Geolocation.";
      break;
    case error.POSITION_UNAVAILABLE:
      locationElement.innerHTML = "Location information is unavailable.";
      break;
    case error.TIMEOUT:
      locationElement.innerHTML = "The request to get user location timed out.";
      break;
    case error.UNKNOWN_ERROR:
      locationElement.innerHTML = "An unknown error occurred.";
      break;
  }
}
