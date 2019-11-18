-- NEW DATABASE
CREATE DATABASE "TCA";

--DROPS
DROP TABLE IF EXISTS "Usuario";
DROP TABLE IF EXISTS "Projeto";

CREATE TABLE "Usuario" (
  "CPF" VARCHAR(15) UNIQUE,
  "username" VARCHAR(20) UNIQUE NOT NULL,
  "email" TEXT NOT NULL,
  "senha" TEXT NOT NULL

  CONSTRAINT "UsuarioPK" PRIMARY KEY ("CPF")
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
  "status" VARCHAR (1) NOT NULL

  CONSTRAINT "ProjetoPK" PRIMARY KEY ("ID"),
  CONSTRAINT "ProjetoFKCriador" FOREIGN KEY ("IDCriador")
    REFERENCES "Usuario"("CPF")
    ON DELETE CASCADE
    ON UPDATE CASCADE,

  CONSTRAINT "ProjetoFKFreelancer" FOREIGN KEY ("IDFreelancer")
    REFERENCES "Usuario"("CPF")
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  
  CONSTRAINT "CheckStatus" CHECK ("status" = 'D' or "status" = 'C')
);
