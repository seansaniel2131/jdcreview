// homeScript.js

function initMap() {
  const mapOptions = {
    center: { lat: 40.712776, lng: -74.005974 }, // Update with your clinic's coordinates
    zoom: 15,
  };

  const map = new google.maps.Map(document.getElementById("map"), mapOptions);

  const marker = new google.maps.Marker({
    position: { lat: 40.712776, lng: -74.005974 }, // Update with your clinic's coordinates
    map: map,
    title: "ABC Dental Clinic",
  });
}
