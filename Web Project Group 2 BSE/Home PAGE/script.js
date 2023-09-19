document.addEventListener("DOMContentLoaded", function() {
  const buttons = document.querySelectorAll("card");
  buttons.forEach((button) => {
      button.addEventListener("click", handleClick);
      function handleClick() {
        console.log("Button works");
      }
  });
});
if (navigator.geolocation) {
    
navigator.geolocation.getCurrentPosition(function(position) {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        // Update the HTML with the user's location
        var locationElement = document.getElementById("location");
        locationElement.innerHTML = "Latitude: " + latitude + ", Longitude: " + longitude;
      });
    } else {
      alert("Geolocation is not supported by this browser.");
    }