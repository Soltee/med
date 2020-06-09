module.exports = {
  theme: {
    extend: {
    	height: {
    		'0.5' : '2px',
        '70'  : '26em',
        '74'  : '32em'
    	},
    	width: {
        '70' : '18em',
        '74' : '20em',
    		'84' : '24em',
    		'90' : '26em'
    	},
      borderWidth: {
        '1' : '1px',
        '2' : '2px'
      },
      backgroundColor: {
        'blue' : '#005082',
        'dark-blue' : '#000839',
        'light-blue' : '#005082',
        'lighter-blue' : '#BFFFFF'
      },
      color:{
        'blue' : '#005082',
        'dark-blue' : '#000839',
        'light-blue' : '#005082',
        'lighter-blue' : '#BFFFFF'
      },
      textColor : {
        'blue' : '#005082',
        'dark-blue' : '#000839',
        'light-blue' : '#005082',
        'lighter-blue' : '#BFFFFF'
      },
      borderColor : {
        'blue' : '#005082',
        'dark-blue' : '#000839',
        'light-blue' : '#005082',
        'lighter-blue' : '#BFFFFF'
      }
    }
  },
  variants: {
  	    margin: ['responsive', 'even'],
  },
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
}
