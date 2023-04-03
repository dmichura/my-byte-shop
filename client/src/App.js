import styled from "styled-components";

import Header from "./components/Header";

const Container = styled("div")`
  width: 100vw;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  /* background-color: rgba(0, 0, 0, 0.5); */
  color: white;
`;

function App() {
  return (
    <Container>
      <Header />
    </Container>
  );
}

export default App;
