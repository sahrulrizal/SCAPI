app.controller('HomeCtrl', function ($scope, $http ) {
    $scope.genre = ['cover','rock','dangdut','jazz','blues','country','rap','death metal','j-pop','new age','r&b','reggae','religi'];
  //   $scope.offset = ['10','20','30','40','50','60','50','60','70','80','90','100','120'];
    $scope.randomGenre = $scope.genre[Math.floor(Math.random() * $scope.genre.length)];
  //   $scope.randomOffset = $scope.offset[Math.floor(Math.random() * $scope.offset.length)];
  // // // Mangambil data dari API
  // var offset = ($noPage-1)*25;

  $http.get("http://api.soundcloud.com/tracks.json?genres="+$scope.randomGenre+"&limit=10&offset=25&client_id=f6fa8262c59cce0df544151a73d64c0e").success(function (val) {
    $scope.sc = val;
      $no = 1;
      if ($no == 1) {
        $('#prev').css({'display' : 'none'});
      }
      $scope.txtrandom = "Random Music : "+$scope.randomGenre;
      $scope.next = [{'link' : '#/page/', 'lim': $no+'/'+$scope.randomGenre}];
  });

  $scope.oke = function(id){
    $.ajax({
      type: "GET",
      url: "http://api.soundcloud.com/tracks/"+id+".json?client_id=f6fa8262c59cce0df544151a73d64c0e",
      dataType: 'json',
      success: function(data1) {
        $.ajax({
          type: "GET",
          url: "http://api.soundcloud.com/tracks/"+id+"/streams?client_id=f6fa8262c59cce0df544151a73d64c0e",
          dataType: 'json',
          success: function(data2) {
            var ap1 = new APlayer({
              element: document.getElementById('player1'),
              narrow: false,
              autoplay: true,
              showlrc: false,
              mutex: true,
              theme: '#e6d0b2',
              music: {
                title: data1.title,
                author: data1.user.username,
                url: data2.http_mp3_128_url,
                pic: data1.artwork_url
              }
            });
            ap1.on('play', function () {
              console.log('play');
            });
            ap1.on('play', function () {
              console.log('play play');
            });
            ap1.on('pause', function () {
              console.log('pause');
            });
            ap1.on('canplay', function () {
              console.log('canplay');
            });
            ap1.on('playing', function () {
              console.log('playing');
            });
            ap1.on('ended', function () {
              console.log('ended');
            });
            ap1.on('error', function () {
              console.log('error');
            });
            ap1.init();

          }
        });
      }
    });
  }

});

app.controller('PageCtrl', function ($scope, $http, $routeParams ) {

      if ($routeParams.n < 1) {
        window.location.assign("#/");
      }

  var a = $routeParams.n - 1;
  var num = ($routeParams.n-1)*25;
  $http.get("http://api.soundcloud.com/tracks.json?genres="+$routeParams.g+"&limit=10&offset="+num+"&client_id=f6fa8262c59cce0df544151a73d64c0e").success(function (val) {
    $scope.next = [{'link' : '#/page/', 'lim': ++$routeParams.n+'/'+$routeParams.g}];
    $scope.prev = [{'link' : '#/page/', 'lim': a+'/'+$routeParams.g}];
    $scope.sc = val;
  });

  $scope.txtrandom = $routeParams.g;

  $scope.oke = function(id){
    $.ajax({
      type: "GET",
      url: "http://api.soundcloud.com/tracks/"+id+".json?client_id=f6fa8262c59cce0df544151a73d64c0e",
      dataType: 'json',
      success: function(data1) {
        $.ajax({
          type: "GET",
          url: "http://api.soundcloud.com/tracks/"+id+"/streams?client_id=f6fa8262c59cce0df544151a73d64c0e",
          dataType: 'json',
          success: function(data2) {
            var ap1 = new APlayer({
              element: document.getElementById('player1'),
              narrow: false,
              autoplay: true,
              showlrc: false,
              mutex: true,
              theme: '#e6d0b2',
              music: {
                title: data1.title,
                author: data1.user.username,
                url: data2.http_mp3_128_url,
                pic: data1.artwork_url
              }
            });
            ap1.on('play', function () {
              console.log('play');
            });
            ap1.on('play', function () {
              console.log('play play');
            });
            ap1.on('pause', function () {
              console.log('pause');
            });
            ap1.on('canplay', function () {
              console.log('canplay');
            });
            ap1.on('playing', function () {
              console.log('playing');
            });
            ap1.on('ended', function () {
              console.log('ended');
            });
            ap1.on('error', function () {
              console.log('error');
            });
            ap1.init();

          }
        });
      }
    });
  }
});

app.controller('SearchCtrl', function ($scope, $http, $routeParams ) {
   if ($routeParams.n < 1) {
        window.location.assign("#/");
      }
      
  var a = $routeParams.n - 1;
  var num = ($routeParams.n-1)*25;
  $http.get("http://api.soundcloud.com/tracks.json?q="+$routeParams.q+"&limit=10&offset="+num+"&client_id=f6fa8262c59cce0df544151a73d64c0e").success(function (val) {
 
    if (val == undefined || val == null || val.length == 0 || (val.length == 1 && val[0] == "")) {
      alert('Kosong bro');
      window.location.assign("#/");
     }else{
      $scope.sc = val;
      $scope.next = [{'link' : '#/search/', 'lim': ++$routeParams.n+'/'+$routeParams.q}];
      $scope.prev = [{'link' : '#/search/', 'lim': a+'/'+$routeParams.q}];
     }
  });

  $scope.srch = 'Search : '+$routeParams.q;

  $scope.oke = function(id){
  $.ajax({
    type: "GET",
    url: "http://api.soundcloud.com/tracks/"+id+".json?client_id=f6fa8262c59cce0df544151a73d64c0e",
    dataType: 'json',
    success: function(data1) {
      $.ajax({
        type: "GET",
        url: "http://api.soundcloud.com/tracks/"+id+"/streams?client_id=f6fa8262c59cce0df544151a73d64c0e",
        dataType: 'json',
        beforeSend: function () {
         $a = $("[id*=klika"+id+"]" ).not(this).addClass('maho').text('Loading..');
       },
       success: function(data2) {
        var ap1 = new APlayer({
          element: document.getElementById('player1'),
          narrow: false,
          autoplay: true,
          showlrc: false,
          mutex: true,
          theme: '#e6d0b2',
          music: {
            title: data1.title,
            author: data1.user.username,
            url: data2.http_mp3_128_url,
            pic: data1.artwork_url
          }
        });
        ap1.on('play', function () {
          console.log('play');
        });
        ap1.on('play', function () {
          console.log('play play');
        });
        ap1.on('pause', function () {
          console.log('pause');
        });
        ap1.on('canplay', function () {
          console.log('canplay');
        });
        ap1.on('playing', function () {
          console.log('playing');
        });
        ap1.on('ended', function () {
          console.log('ended');
        });
        ap1.on('error', function () {
          console.log('error');
        });
        ap1.init();

      },
      complete: function () {
        $("[class*=maho]" ).text('PLAY').css({'background':'#c9302c','border-color':'#ac2925'});
        $('#klika'+id).text('IS PLAYING :D').css({'background':'#03A9F4','border-color':'#03A9F4'});
      }
    });
    }
  });
  }

});

// app.controller('DetailCtrl', function ($scope, $http, $routeParams ) {
//   // Detail
//   $http.get('http://api.soundcloud.com/tracks/'+$routeParams.id_detail+'.json?client_id=f6fa8262c59cce0df544151a73d64c0e').success(function (val) {
//     $scope.detail = [{'title' : val.title}];
//   });
// });
