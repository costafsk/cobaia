-- NEW DATABASE
CREATE DATABASE "TCA";

--DROPS
DROP TABLE IF EXISTS "Usuario";
DROP TABLE IF EXISTS "Proposta";
DROP TABLE IF EXISTS "Projeto";

CREATE TABLE "Usuario" (
  "CPF" VARCHAR(15) UNIQUE,
  "foto" text,
  "username" VARCHAR(20) UNIQUE NOT NULL,
  "email" TEXT NOT NULL,
  "senha" TEXT NOT NULL,
  "projetosConcluidos" INTEGER NOT NULL,

  CONSTRAINT "UsuarioPK" PRIMARY KEY ("CPF")
);

CREATE TABLE "Proposta" (
  "ID" SERIAL,
  "valor" NUMERIC(5, 2),
  "prazo" VARCHAR(100) NOT NULL,
  "descricao" TEXT NOT NULL,
  "modalidade" TEXT NOT NULL,
  "IDUsuario" VARCHAR(15) NOT NULL,

  CONSTRAINT "PropostaPK" PRIMARY KEY ("ID"),
  CONSTRAINT "PropostaFKUsuario" FOREIGN KEY ("IDUsuario")
      REFERENCES "Usuario"("CPF")
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE "Projeto" (
  "ID" SERIAL,
  "IDFreelancer" VARCHAR(15),
  "titulo" VARCHAR(100) NOT NULL,
  "tipoDePagamento" TEXT NOT NULL,
  "valor" NUMERIC(5, 2) NOT NULL,
  "prazo" VARCHAR(100) NOT NULL,
  "descricao" TEXT NOT NULL,
  "IDCriador" VARCHAR(15) NOT NULL,
  "IDNota" INT,

  CONSTRAINT "ProjetoPK" PRIMARY KEY ("ID"),
  CONSTRAINT "ProjetoFKCriador" FOREIGN KEY ("IDCriador")
    REFERENCES "Usuario"("CPF")
    ON DELETE CASCADE
    ON UPDATE CASCADE,

  CONSTRAINT "ProjetoFKFreelancer" FOREIGN KEY ("IDFreelancer")
    REFERENCES "Usuario"("CPF")
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
