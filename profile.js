$(function () {
  close_modal = function () {
    $("#loginModal").hide()
    $("#sigupModal").hide()
  }
  sigupconfirm = function () {
    $("#sigupModal").hide()
  }
  login = function () {
    $("#loginModal").show()
    $("#sigupModal").hide()
  }
  sigup = function () {
    $("#sigupModal").show()
    $("#loginModal").hide()
  }
    cartOpen =function(){
      $("#cartModal").show()

    }
    cartClose=function(){
      $("#cartModal").hide()
    }
});