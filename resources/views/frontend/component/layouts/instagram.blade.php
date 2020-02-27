  <!-- Instagram Feeds -->
  <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>Instagram Feeds</h3>
        </div>
    </div>
</div>
<div class="container" style="background-color: #ffffff; z-index: 9 !important;">
    <div id="portfolio" class="portfolio portfolio-nomargin grid-container portfolio-notitle portfolio-full grid-container clearfix">

        <div id="instagram-post">

        </div>

    </div>
    <a href="{{ Helper::baseInstagram() }}" style="background-color: #ffffff; z-index: 9 !important;">
        <div class="btn-load-more">Load more post...</div>
    </a>
</div>

<!-- end instagram -->

@section('js')

<script>
  function nFormatter(num){
    if(num >= 1000000000){
      return (num/1000000000).toFixed(1).replace(/\.0$/,'') + 'G';
    }
    if(num >= 1000000){
      return (num/1000000).toFixed(1).replace(/\.0$/,'') + 'M';
    }
    if(num >= 1000){
      return (num/1000).toFixed(1).replace(/\.0$/,'') + 'K';
    }
    return num;
  }
  $.ajax({
    url:"{{ Helper::baseInstagram() }}?__a=1",
    type:'get',
    success:function(response){
      posts = response.graphql.user.edge_owner_to_timeline_media.edges;
      posts_html = '';
      for(var i=0;i<posts.length;i++){
        url = posts[i].node.display_url;
        likes = posts[i].node.edge_liked_by.count;
        comments = posts[i].node.edge_media_to_comment.count;
        caption = posts[i].node.edge_media_to_caption.edges[0].node.text;
        video = posts[i].node.is_video;
        posts_html += '<article class="portfolio-item pf-media pf-icons">' +
                        '<div class="portfolio-image">'  +
                            '<a href="'+url+'">'  +
                                '<img src="'+url+'" alt="Open Imagination">' +
                            '</a>' +
                            '<div class="portfolio-overlay">' +
                                'if ('+video+' == true) {' +
                                    '<center><a href="'+url+'"><i class="icon-play"></i></a></center>' +
                                '}' +
                            '</div>' +
                        '</div>' +
                        '<div class="portfolio-desc">' +
                            '<a href="'+url+'" style="font-size: 8px; line-height: normal" title="'+caption+'">'+caption.substr(0, 50)+'...</a>' +
                            '<span><a href="#">'+nFormatter(likes)+' like</a>, <a href="#">'+nFormatter(comments)+' comment</a></span>' +
                        '</div>' +
                    '</article>'
      }
      $("#instagram-post").html(posts_html);
    }
  });
</script>

@endsection