/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.php", "./*.php"],
  theme: {
    screens: {
      sm: '480px',
      md: '868px',
      lg: '976px',
      xl: '1440px',
    },
    extend: {
      fontFamily: {
        times: ['"Times New Roman"', "Times", "serif"],
      },
      colors: {
        orange1: "#FFBF00", // rgb(255, 191, 0)
        orange2: "#FF9A00", // rgb(255, 154, 0)
        orange3: "#FE4F2D", // fixed here
        brown11: "rgb(217, 131, 36)",
      },
    },
  },
  plugins: [],
}
