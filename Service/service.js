document.getElementById('filterButton').addEventListener('click', function() {
  // Retrieve the filter value from the input field
  var filterValue = document.getElementById('filterInput').value;

  // Get all the video items
  var videoItems = document.getElementsByClassName('video-item');

  // Loop through each video item and hide/show based on the filter value
  for (var i = 0; i < videoItems.length; i++) {
    var videoItem = videoItems[i];

    // Check if the video item matches the filter value
    if (videoItem.textContent.toLowerCase().includes(filterValue.toLowerCase())) {
      videoItem.style.display = 'grid'; // Show the video item
    } else {
      videoItem.style.display = 'none'; // Hide the video item
    }
  }
});
 var videos = document.getElementsByTagName('video');
  function pauseAllVideos() {
    for (var i = 0; i < videos.length; i++) {
      videos[i].pause();
    }
  }
  var pauseButton = document.getElementById('reloadButton');
  pauseButton.addEventListener('click', pauseAllVideos);
