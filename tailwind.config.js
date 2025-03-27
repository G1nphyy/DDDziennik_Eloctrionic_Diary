export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js", "./resources/**/*.vue", "./resources/**/**/*.blade.php"],
    theme: {
        extend: {
            colors: {
                'dark-a0': '#000000',
                'light-a0': '#ffffff',
                'black': '#090909',
                "tonal-a0": "#202020",
                "tonal-a5": "#2b2b2b",
                "tonal-a10": "#353535",
                "tonal-a20":  "#4b4b4b",
                "tonal-a30": "#626262",
                "tonal-a40":  "#7a7a7a",
                "tonal-a50": "#939393",
                'primary-a0': '#ffffff',
            },
            fontFamily: {
                'consolas' : ['Consolas', 'monospace'],
            },

        },
    },
    plugins: [

    ],
    darkMode: 'class',
}
