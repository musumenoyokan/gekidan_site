new TWTR.Widget({
	version: 2,
	type: 'profile',
	rpp: 8,
	interval: 6000,
	width: 268,
	height: 300,
	theme: {
		shell: {
			background: '#333333',
			color: '#ffffff'
    		},
    		tweets: {
      			background: '#000000',
      			color: '#ffffff',
      			links: '#4aed05'
    		}
	},
  	features: {
    		scrollbar: true,
		loop: false,
		live: true,
		hashtags: true,
    		timestamp: true,
    		avatars: false,
		behavior: 'all'
	}
}).render().setUser('musumenoyokan').start();

