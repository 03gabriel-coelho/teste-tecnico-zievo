"use client";

import styles from "@/styles/Header.module.css";
import { GiBookshelf } from "react-icons/gi";

export default function Header() {
  return (
    <header className={styles.header}>
      <GiBookshelf width={200} height={200}/>
      <h1>Zievo Books</h1>
    </header>
  );
}