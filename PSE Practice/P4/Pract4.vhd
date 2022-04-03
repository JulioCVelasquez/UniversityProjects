--Julio Velásquez Cárdenas 1397896--
--Sergio Prada Maeso 1459122--

library ieee;
use IEEE.std_logic_1164.all;

entity Pract4 is
	port( clk: in std_logic;
		  reset: in std_logic;
		  input: in std_logic;
		  output: out std_logic);
end Pract4;

architecture behavioural of Pract4 is 
type state_type is (s0,s1,s2);
signal current_s,next_s:state_type;

begin 
	process(clk,reset)
	begin
		if reset = '1' then
			current_s <= s0;
		elsif rising_edge(clk) then
			current_s <= next_s;
		end if;
	end process;
	
	process(current_s,input)
	begin
		case current_s is
			when s0 => 
				if input = '1' then
					output <= '0';
					next_s <= s1;
				else 
					output <= '0';
					next_s <= s2;
				end if;
			when s1 => 
				if input = '1' then
					output <= '1';
					next_s <= s1;
				else
					output <= '1';
					next_s <= s2;
				end if;
			when s2 =>
				if input = '1' then 
					output <= '0';
					next_s <= s1;
				else
					output <= '0';
					next_s <= s2;
				end if;
			end case;
	end process;
end behavioural;

