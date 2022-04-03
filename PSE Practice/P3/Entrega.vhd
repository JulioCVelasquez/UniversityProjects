--Sergio Prada Maeso 1459122--
--Julio Velásquez Cárdenas 1397896--

library ieee;
use ieee.std_logic_1164.all;
use ieee.std_logic_unsigned.all;
use ieee.std_logic_arith.all;

entity Entrega is 
	port(
		 reset: IN std_logic;
		 clk: IN std_logic;
		 enable: IN std_logic;
		 salida: OUT std_logic_vector (3 DOWNTO 0)
		 );
end Entrega;

architecture behaviour of Entrega is

signal counter: std_logic_vector (3 DOWNTO 0);

begin 
	process(clk,reset,enable)
	begin
		if reset = '0' then counter <= "1001";
		elsif rising_edge(clk) then
			if enable='1'then 
				if counter = "0000" then
					counter <= "1001"; 
				else 
					counter <= counter-1;
				end if;
			end if;
		end if;
	end process;
	salida <= counter;	
end behaviour;		

