<template>
    <div>
      <table>
        <tr v-for="(row, rowIndex) in grid" :key="rowIndex">
          <td v-for="(cell, colIndex) in row" :key="colIndex">
            <input
              spellcheck="false"
              v-focus
              type="text"
              v-model="cell.formula"
              v-if="cell.active"
              @keypress.enter="endFormula"
              @keyup="style(cell)"
              @blur="destyle"
            />
            <div :cellName="cell.name" v-if="!cell.active" @mousedown="enterCell($event, cell)">
              {{ calculate(cell.formula) }}
            </div>
          </td>
        </tr>
      </table>
    </div>
  </template>
  
  <script>
  import { ref, watchEffect } from "vue";
  
  export default {
    props: {
      cols: { type: Number, required: true },
      rows: { type: Number, required: true },
    },
    setup(props) {
      const grid = ref([]);
      const alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split("");
      const colors = ref([]);
  
      const editMode = ref(null);
  
      const instantiateGrid = () => {
        for (let x = 0; x < props.rows; x++) {
          const row = [];
          for (let y = 0; y < props.cols; y++) {
            row.push({ formula: null, name: null, active: false });
          }
          grid.value.push(row);
        }
      };
  
      const nameGrid = () => {
        grid.value.forEach((row, rowIndex) => {
          row.forEach((cell, colIndex) => {
            cell.name = `${alphabet[colIndex]}${rowIndex + 1}`;
          });
        });
      };
  
      const instantiateColors = () => {
        const amount = props.cols * props.rows;
        for (let i = 0; i < amount; i++) {
          colors.value.push(getRandomColor());
        }
      };
  
      const getRandomColor = () => {
        const letters = "0123456789ABCDEF";
        let color = "#";
        for (let i = 0; i < 6; i++) {
          color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
      };
  
      const destyle = () => {
        document.querySelectorAll("[cellName]").forEach((el) => {
          el.style.border = "";
        });
      };
  
      const style = (cell) => {
        const isFormula = /^=.+/.test(cell.formula);
        if (!isFormula) return;
  
        const refs = cell.formula.replace(/\s/g, "").replace(/=/g, "").split(/[*/+-]/);
        refs.forEach(highlightCell);
      };
  
      const highlightCell = (name, index) => {
        const el = document.querySelector(`[cellName=${name}]`);
        if (!el) return;
        const color = colors.value[index];
        el.style.border = `2px solid ${color}`;
      };
  
      const endFormula = () => {
        editMode.value.active = false;
        editMode.value = null;
      };
  
      const enterCell = (event, cell) => {
        if (editMode.value && /.*[=/*\-+]$/.test(editMode.value.formula)) {
          event.preventDefault();
          editMode.value.formula += cell.name;
          style(editMode.value);
        } else {
          if (editMode.value) editMode.value.active = false;
          editMode.value = cell;
          style(editMode.value);
          cell.active = true;
        }
      };
  
      const calculate = (formula) => {
        const isFormula = /^=.+/.test(formula);
        if (!isFormula) return formula;
  
        const operators = formula.replace(/[^*/+-]/g, "").split("");
  
        return (
          formula
            .replace(/\s/g, "")
            .replace(/=/g, "")
            .split(/[*/+-]/)
            .map((cell, index) => {
              let resolvedValue = null;
              grid.value.forEach((row, rowIndex) => {
                row.forEach((col, colIndex) => {
                  if (col.name == cell) resolvedValue = parseFloat(calculate(col.formula));
                });
              });
              if (!resolvedValue) return parseFloat(cell);
              else return resolvedValue;
            })
            .reduce((result, current, index) => {
              if (index === 0) return current;
              switch (operators[index - 1]) {
                case "+":
                  return result + current;
                case "-":
                  return result - current;
                case "*":
                  return result * current;
                case "/":
                  return result / current;
              }
            }, 0) || "#error"
        );
      };
  
      const cell = (col, row) => {
        return `${alphabet[col]}${row + 1}`;
      };
  
      const instantiateGridAndColors = () => {
        instantiateGrid();
        nameGrid();
        instantiateColors();
      };
  
      // Initialize grid and colors
      watchEffect(() => {
        instantiateGridAndColors();
      });
  
      return {
        grid,
        alphabet,
        colors,
        editMode,
        destyle,
        style,
        endFormula,
        enterCell,
        calculate,
        cell,
      };
    },
  };
  </script>
  
  <style scoped>
  /* Your component-specific styles go here */
  </style>
  