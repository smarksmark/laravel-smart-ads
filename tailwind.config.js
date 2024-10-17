/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            rotate: {
                '-1': '-1deg',
                '-2': '-2deg',
                '-3': '-3deg',
                '1': '1',
                '2': '2deg',
                '3': '3deg',
            },
            borderRadius: {
                'xl': '0.8rem',
                'xxl': '1rem',
            },
            height: {
                '1/2': '0.125rem',
                '2/3': '0.1875rem',
            },
            maxHeight: {
                '16': '16rem',
                '20': '20rem',
                '24': '24rem',
                '32': '32rem',
            },
            inset: {
                '1/2': '50%',
            },
            width: {
                '96': '24rem',
                '104': '26rem',
                '128': '32rem',
            },
            transitionDelay: {
                '450': '450ms',
            },
            colors: {
                'wave': {
                    50: '#F2F8FF',
                    100: '#E6F0FF',
                    200: '#BFDAFF',
                    300: '#99C3FF',
                    400: '#4D96FF',
                    500: '#0069FF',
                    600: '#005FE6',
                    700: '#003F99',
                    800: '#002F73',
                    900: '#00204D',
                },
            },
            backgroundImage: (theme) => ({
                'gradient-primary': 'linear-gradient(180deg, #AC2FA8 0%, #2F33A7 20.5%, #2F33A7 59.5%, #1C70FF 100%)',
                'gradient-hero-banner': 'linear-gradient(92deg, #FD1996 0%, #F3B13E 100%)',
                'gradient-header': 'linear-gradient(0deg, #AC2FA8 0%, #1659C9 100%)',
                'gradient-footer': 'linear-gradient(180deg, #1C70FF 0%, #0A2B60 50%)'
            }),
        }
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }