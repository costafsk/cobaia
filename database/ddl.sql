--DROPS
--DROP TABLE IF EXISTS "Usuario";
--DROP TABLE IF EXISTS "Projeto";

CREATE TABLE "Usuario" (
  "CPF" VARCHAR(15),
  "username" VARCHAR(20) UNIQUE NOT NULL,
  "email" TEXT NOT NULL,
  "senha" TEXT NOT NULL,
  "descricao" TEXT NOT NULL,

  CONSTRAINT "UsuarioPK" PRIMARY KEY ("CPF")
);

CREATE TABLE "Projeto" (
  "ID" SERIAL,
  "titulo" VARCHAR(100) NOT NULL,
  "tipoDeProjeto" VARCHAR(100) NOT NULL,
  "tipoDePagamento" TEXT NOT NULL,
  "valor" NUMERIC(5, 2) NOT NULL,
  "prazo" VARCHAR(100) NOT NULL,
  "descricao" TEXT NOT NULL,
  "CPFCriador" VARCHAR(15) NOT NULL,
  "requisitos" TEXT NOT NULL,
  "moeda" VARCHAR(15) NOT NULL,
  "status" VARCHAR (1) NOT NULL,
  "criadoEm" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  CONSTRAINT "ProjetoPK" PRIMARY KEY ("ID"),
  CONSTRAINT "ProjetoFKCriador" FOREIGN KEY ("CPFCriador")
    REFERENCES "Usuario"("CPF")
    ON DELETE CASCADE
    ON UPDATE CASCADE,

  CONSTRAINT "CheckStatus" CHECK ("status" = 'D' or "status" = 'P' or "status" = 'A')
);
