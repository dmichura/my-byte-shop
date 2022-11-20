import React, { useState } from "react";

import Home from "./view/Home";
import styled from "styled-components";
import { useEffect } from "react";
import { BoyRounded } from "@mui/icons-material";

const Container = styled.div`
  width: 100%;
  height: 100vh;
  background: var(--background);
  overflow-x: hidden;
`;

const checkTheme = async () => {
  let theme = null;
  if (theme == null) {
    if (window.matchMedia) {
      // Check if the browser supports
      theme = window.matchMedia("(prefers-color-scheme: dark)").matches
        ? "dark"
        : "light";
    } else {
      theme = "dark";
    }
  }

  return theme;
};

function App() {
  // const [lang, setLang] = useState("PL");
  const [theme, setTheme] = useState(localStorage.getItem("app-theme") || null);

  useEffect(() => {
    // init
    checkTheme().then((a) => setTheme(a));
  }, []);

  useEffect(() => {
    if (theme === "light") {
      document.body.classList.add("light");
      document.body.classList.remove("dark");
    } else {
      document.body.classList.add("dark");
      document.body.classList.remove("light");
    }
  }, [theme]);

  return (
    <Container>
      <Home />
    </Container>
  );
}

export default App;
