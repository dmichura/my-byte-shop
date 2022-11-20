import { css } from "styled-components";

export const desktop = (props) => {
  return css`
    @media screen and (min-width: 1200px) {
      ${props}
    }
  `;
};
