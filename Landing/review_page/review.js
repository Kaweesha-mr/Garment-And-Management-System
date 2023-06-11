
 // Function to update a review
function updateReview(reviewId) {
  // Get the values from the form inputs
  var productName = document.querySelector("input[name='product_name[]'][data-review-id='" + reviewId + "']").value;
  var reviewText = document.querySelector("textarea[name='review_text[]'][data-review-id='" + reviewId + "']").value;

  // Perform input validation and sanitization as needed

  // Send an AJAX request to update the review
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "update_review.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response if needed
      console.log(xhr.responseText);
    }
  };
  xhr.send("review_id=" + reviewId + "&product_name=" + encodeURIComponent(productName) + "&review_text=" + encodeURIComponent(reviewText));
}

// Function to delete a review
function deleteReview(reviewId) {
  // Send an AJAX request to delete the review
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "delete_review.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response if needed
      console.log(xhr.responseText);
      // Remove the deleted review row from the table
      var reviewRow = document.getElementById("review_" + reviewId);
      if (reviewRow) {
        reviewRow.remove();
      }
    }
  };
  xhr.send("review_id=" + reviewId);
}

