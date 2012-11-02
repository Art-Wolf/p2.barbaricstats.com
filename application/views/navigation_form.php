<div class="container span4">
	<div class="nav-panel">
		<h1>Word Cloud</h1>
		<div class="span3" id="wordcloud"></div>
<script type="text/javascript">
      var word_list = new Array(
        {text: "Lorem", weight: 13, link: "/search/tag/a"},
        {text: "Ipsum", weight: 10.5, link: "/search/tag/a"},
        {text: "Dolor", weight: 9.4, link: "/search/tag/a"},
        {text: "Sit", weight: 8, link: "/search/tag/a"},
        {text: "Amet", weight: 6.2, link: "/search/tag/a"},
        {text: "Consectetur", weight: 5, link: "/search/tag/a"},
        {text: "Adipiscing", weight: 5, link: "/search/tag/a"},
        {text: "Elit", weight: 5, link: "/search/tag/a"},
        {text: "Nam et", weight: 5, link: "/search/tag/a"},
        {text: "Leo", weight: 4, link: "/search/tag/a"},
        {text: "Sapien", weight: 4, link: "http://www.lucaongaro.eu/"},
        {text: "Pellentesque", weight: 3, link: "/search/tag/a"},
        {text: "habitant", weight: 3, link: "/search/tag/a"},
        {text: "morbi", weight: 3, link: "/search/tag/a"},
        {text: "tristisque", weight: 3, link: "/search/tag/a"},
        {text: "senectus", weight: 3, link: "/search/tag/a"},
        {text: "et netus", weight: 3, link: "/search/tag/a"},
        {text: "et malesuada", weight: 3, link: "/search/tag/a"},
        {text: "fames", weight: 2, link: "/search/tag/a"},
        {text: "ac turpis", weight: 2, link: "/search/tag/a"},
        {text: "egestas", weight: 2, link: "/search/tag/a"},
        {text: "Aenean", weight: 2, link: "/search/tag/a"},
        {text: "vestibulum", weight: 2, link: "/search/tag/a"},
        {text: "elit", weight: 2, link: "/search/tag/a"},
        {text: "sit amet", weight: 2, link: "/search/tag/a"},
        {text: "metus", weight: 2, link: "/search/tag/a"},
        {text: "adipiscing", weight: 2, link: "/search/tag/a"},
        {text: "ut ultrices", weight: 2, link: "/search/tag/a"},
        {text: "justo", weight: 1, link: "/search/tag/a"},
        {text: "dictum", weight: 1, link: "/search/tag/a"},
        {text: "Ut et leo", weight: 1, link: "/search/tag/a"},
        {text: "metus", weight: 1, link: "/search/tag/a"},
        {text: "at molestie", weight: 1, link: "/search/tag/a"},
        {text: "purus", weight: 1, link: "/search/tag/a"},
        {text: "Curabitur", weight: 1, link: "/search/tag/a"},
        {text: "diam", weight: 1, link: "/search/tag/a"},
        {text: "dui", weight: 1, link: "/search/tag/a"},
        {text: "ullamcorper", weight: 1, link: "/search/tag/a"},
        {text: "id vuluptate ut", weight: 1, link: "/search/tag/a"},
        {text: "mattis", weight: 1, link: "/search/tag/a"},
        {text: "et nulla", weight: 1, link: "/search/tag/a"},
        {text: "Sed", weight: 1, link: "/search/tag/a"}
      );
      $(document).ready(function() {
        $("#wordcloud").jQCloud(word_list);
      });
</script>
<style type="text/css">
      #wordcloud {
        margin: 30px auto;
        width: 300px;
        height: 371px;
        border: none;
      }
      #wordcloud span.w10, #wordcloud span.w9, #wordcloud span.w8, #wordcloud span.w7 {
        text-shadow: 0px 1px 1px #ccc;
      }
      #wordcloud span.w3, #wordcloud span.w2, #wordcloud span.w1 {
        text-shadow: 0px 1px 1px #fff;
      }
    </style>
	</div>
</div>
